var app = new Vue({
  el: "#app",
  data: {
    state: "",
    web3Address: "",
    config: { headers: { "Content-Type": "application/x-www-form-urlencoded" } }
  },
  methods: {
    logInSOL: async function() {
      if (window.solana.isPhantom) {
        await window.solana.connect();
        window.solana.on("connect", () => document.getElementById("solana-button").innerText = "Sign Message With Phantom");

        if(window.solana.isConnected) {
          try {
            this.login();
          } catch (error) {
            console.log(error);
            this.state = 'signTheMessage';
            return;
          }
        }
        else {
          this.state = 'needLogInToWallet';
          return;
        }
      }
      else {
        this.state = 'needPhantom';
        return;
      }
    },
    logInETH: async function() {
      await onConnectLoadWeb3Modal();

      if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
          this.login("web3-ajax-user");
        } catch (error) {
          console.log(error);
          this.state = 'signTheMessage';
          return;
        }
      }
      else {
        this.state = 'needLogInToWallet';
        return;
      }
    },
    logInETHPlayer: async function() {
      await onConnectLoadWeb3Modal();

      if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
          this.login("web3-ajax-player");
        } catch (error) {
          console.log(error);
          this.state = 'signTheMessage';
          return;
        }
      }
      else {
        this.state = 'needLogInToWallet';
        return;
      }
    },
    login: async function(filename) {
      var vm = this;
      let address = null;
      let address_encode;
      //console.log(filename);

      if (web3ModalProv) {
        let accountsOnEnable = await web3.eth.getAccounts();
        address = accountsOnEnable[0];
        address = address.toLowerCase();
      }
      else if(window.solana.isConnected) {
        // SOL address are case sensitive
        let address_encode = nacl.util.encodeBase64(window.solana.publicKey.encode());
        //console.log('Public Key - Encoded');
        //console.log(address_encode);
        //console.log('Public Key - To String');
        address = window.solana.publicKey.toString();
        //console.log(address);
        //console.log('Public Key - To String - Dencoded');
        //console.log(nacl.util.encodeBase64(address));
      }

      if (address == null) {
        vm.state = "needLogInToWallet";
        return;
      }
      vm.state = "signTheMessage";

      
      await axios.post(
        "/" + filename + ".php",
        {
          request: "login",
          address: address
        },
        vm.config
      )
      .then(function(response) {
        if (response.data.substring(0, 5) != "Error") {
          let message = response.data;
          let publicAddress = address;
          //console.log('Lets sign the message');
          if (web3ModalProv) {
            console.log('On the Eth Network');
            handleSignMessageETH(message, publicAddress, filename).then(handleAuthenticate);
          }
          else if(window.solana.isConnected) {
            console.log('On the Solana Network');
            handleSignMessageSOL(message, publicAddress);
          }
        } 
        else {
          console.log("Error: " + response.data);
        }
      })
      .catch(function(error) {
        console.error(error);
      });

      // Functions //

      function handleSignMessageETH(message, publicAddress, filename) {
        return new Promise((resolve, reject) =>  
        web3.eth.personal.sign(
            web3.utils.utf8ToHex(message),
            publicAddress,
            (err, signature) => {
              console.log('Signature');
              console.log(signature);
              if (err) vm.state = "signTheMessage";
              return resolve({ publicAddress, signature, filename });
            }
          )
        );
      }

      async function handleSignMessageSOL(message, publicAddress) {
          //console.log('Message')
          //console.log(message);
          const encodedMessage = new TextEncoder().encode(message);
          const signedMessage = await window.solana.signMessage(encodedMessage, "utf8");

          console.log('Signature - Decoded');
          let signatureDecoded = nacl.util.encodeBase64(signedMessage.signature);
          console.log(signatureDecoded);

          handleAuthenticate({ publicAddress, signatureDecoded });
      }

      function handleAuthenticate({ publicAddress, signature }) {
        axios
          .post(
            "/" + arguments[0].filename + ".php",
            {
              request: "auth",
              address: arguments[0].publicAddress,
              signature: arguments[0].signature
            },
            vm.config
          )
          .then(function(response) {
            console.log('Lets see the response to the signature from the backend');
            console.log(response);
            if (response.data[0] == "Success") {
              // Clear Web3 wallets data
              localStorage.clear();

              vm.state = "loggedIn";
              vm.web3Address = address;
              
              window.location = '/dashboard';
            }
          })
          .catch(function(error) {
            console.error(error);
          });
      }
    }
  },
  mounted() {
  }
});