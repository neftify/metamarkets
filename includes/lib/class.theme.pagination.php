<?php

class Pagination
{
    public $total_results;
    public $records_per_page;
    public $url;
    public $this_page;

    private $offset;
    private $total_pages;
    private $current_page;

    function __construct($total_results, $url) {
        $this->total_results = $total_results;
        $this->url = $url;

        // get current records per page
        if (!empty($_GET['show']) && is_numeric($_GET['show']) && $_GET['show']>=10) {
            if($_GET['show']==10 || $_GET['show']==25 || $_GET['show']==50 || $_GET['show']==100) {
                $this->records_per_page = $_GET['show'];
                $this->url = $this->url.'&show='.$_GET['show'];
            }
            else {
                $this->records_per_page = 10;
            }
        } 
        else {
            $this->records_per_page = 10;
        }

        // get current page
        if (!empty($_GET['p']) && is_numeric($_GET['p'])) {
            $this->current_page = $_GET['p'];
        } 
        else {
            $this->current_page = 1;
        }

        // set private vars
        $this->offset = ($this->current_page - 1) * $this->records_per_page;
        $this->total_pages = ceil($this->total_results / $this->records_per_page);
    }

    function get_page() {
        return $this->current_page;
    }

    function get_offset() {
        return $this->offset;
    }

    function get_records_per_page() {
        return $this->records_per_page;
    }

    function print() {
        echo '<div class="flex flex-wrap mt-2 -mx-4 items-center justify-between">';

        if($this->total_results>10) {
            echo '<div class="w-full lg:w-1/3 px-4 flex items-center mb-4 lg:mb-0">';
                echo '<p class="text-xs text-gray-400" data-config-id="pag1">Show</p>';
                echo '<div class="mx-3 py-2 px-2 text-xs text-gray-500 bg-white border rounded">';
                    echo '<form method="GET" id="show">';

                    if(isset($_GET)) {
                        foreach($_GET as $id => $value) {
                            // we avoid pages because they change with every $_GET
                            if($id!='p') {
                                echo '<input type="hidden" name="'.$id.'" value="'.$value.'">';
                            }
                        }
                    }
                    echo '<select name="show" onchange="showForm()">';

                        if($this->records_per_page==10) {
                            echo '<option value="10" selected>10</option>';
                        }
                        else {
                            echo '<option value="10">10</option>';
                        }

                        if($this->total_results>=25) {
                            if($this->records_per_page==25) {
                                echo '<option value="25" selected>25</option>';
                            }
                            else {
                                echo '<option value="25">25</option>';
                            }
                        }

                        if($this->total_results>=50) {
                            if($this->records_per_page==50) {
                                echo '<option value="50" selected>50</option>';
                            }
                            else {
                                echo '<option value="50">50</option>';
                            }
                        }

                        if($this->total_results>=100) {
                            if($this->records_per_page==100) {
                                echo '<option value="100" selected>100</option>';
                            }
                            else {
                                echo '<option value="100">100</option>';
                            }
                        }

                    echo '</select>';
                    echo '</form>';
                echo '</div>';
                echo '<p class="text-xs text-gray-400">of '.$this->total_results.'</p>';
            echo '</div>';
        }

        echo '<div class="w-full lg:w-auto px-4 flex items-center justify-center">';

        // Previous page
        if ($this->current_page > 1) {
            echo '<a href="?p=' . ($this->current_page - 1) . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">
            <svg width="6" height="8" viewbox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg" data-config-id="auto-svg-17-14">
                <path
                    d="M2.53335 3.99999L4.86668 1.66666C5.13335 1.39999 5.13335 0.999992 4.86668 0.733325C4.60002 0.466659 4.20002 0.466659 3.93335 0.733325L1.13335 3.53333C0.866683 3.79999 0.866683 4.19999 1.13335 4.46666L3.93335 7.26666C4.06668 7.39999 4.20002 7.46666 4.40002 7.46666C4.60002 7.46666 4.73335 7.39999 4.86668 7.26666C5.13335 6.99999 5.13335 6.59999 4.86668 6.33333L2.53335 3.99999Z"
                    fill="#A4AFBB"
                ></path>
            </svg>
            </a>';
        }

        if ($this->total_pages > 1) {

            //First page
            if ($this->current_page != 1) {
                echo '<a href="?p=1&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">1</a>';
            }

            //Place holder
            //We don't show it in the first 3 pages
            if ($this->current_page != 1 && $this->current_page != 2 && $this->current_page != 3) {
                echo '<span class="inline-block mr-3">
                <svg class="h-3 w-3 text-gray-200" viewbox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg" data-config-id="auto-svg-18-14">
                    <path
                        d="M6 0.666687C5.26667 0.666687 4.66667 1.26669 4.66667 2.00002C4.66667 2.73335 5.26667 3.33335 6 3.33335C6.73333 3.33335 7.33333 2.73335 7.33333 2.00002C7.33333 1.26669 6.73333 0.666687 6 0.666687ZM1.33333 0.666687C0.6 0.666687 0 1.26669 0 2.00002C0 2.73335 0.6 3.33335 1.33333 3.33335C2.06667 3.33335 2.66667 2.73335 2.66667 2.00002C2.66667 1.26669 2.06667 0.666687 1.33333 0.666687ZM10.6667 0.666687C9.93333 0.666687 9.33333 1.26669 9.33333 2.00002C9.33333 2.73335 9.93333 3.33335 10.6667 3.33335C11.4 3.33335 12 2.73335 12 2.00002C12 1.26669 11.4 0.666687 10.6667 0.666687Z"
                        fill="currentColor"
                    ></path>
                </svg>
                </span>';
            }

            //Backward pages
            if ($this->current_page - 2 >= 2) {
                echo '<a href="?p=' . ($this->current_page - 2) . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">'.($this->current_page - 2).'</a>';
            }
            if ($this->current_page - 1 > 1) {
                echo '<a href="?p=' . ($this->current_page + - 1) . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">'.($this->current_page - 1).'</a>';
            }

            //Show current page
            echo '<a class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-white bg-indigo-500 rounded" href="#">' . $this->current_page . '</a>';

            //Foward pages
            if ($this->current_page + 1 < $this->total_pages) {
                echo '<a href="?p=' . ($this->current_page + 1) . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">'.($this->current_page + 1).'</a>';
            }
            if ($this->current_page + 2 < $this->total_pages) {
                echo '<a href="?p=' . ($this->current_page + 2) . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">'.($this->current_page + 2).'</a>';
            }

            //Place holder
            //We don't show it is its the last 3 pages
            if ($this->current_page != $this->total_pages && $this->current_page != $this->total_pages - 1 && $this->current_page != $this->total_pages - 2) {
                echo '<span class="inline-block mr-3">
                <svg class="h-3 w-3 text-gray-200" viewbox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg" data-config-id="auto-svg-19-14">
                    <path
                        d="M6 0.666687C5.26667 0.666687 4.66667 1.26669 4.66667 2.00002C4.66667 2.73335 5.26667 3.33335 6 3.33335C6.73333 3.33335 7.33333 2.73335 7.33333 2.00002C7.33333 1.26669 6.73333 0.666687 6 0.666687ZM1.33333 0.666687C0.6 0.666687 0 1.26669 0 2.00002C0 2.73335 0.6 3.33335 1.33333 3.33335C2.06667 3.33335 2.66667 2.73335 2.66667 2.00002C2.66667 1.26669 2.06667 0.666687 1.33333 0.666687ZM10.6667 0.666687C9.93333 0.666687 9.33333 1.26669 9.33333 2.00002C9.33333 2.73335 9.93333 3.33335 10.6667 3.33335C11.4 3.33335 12 2.73335 12 2.00002C12 1.26669 11.4 0.666687 10.6667 0.666687Z"
                        fill="currentColor"
                    ></path>
                </svg>
                </span>';
            }

            //Last page
            if ($this->current_page != $this->total_pages) {
                echo '<a href="?p=' . $this->total_pages . '&' . $this->url . '" class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs border border-gray-300 bg-white hover:bg-indigo-50 rounded">' . $this->total_pages . '</a>';
            }
        }

        // Next page
        if ($this->current_page < $this->total_pages) {
            echo '<a href="?p=' . ($this->current_page + 1) . '&' . $this->url . '" class="inline-flex items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded">
            <svg width="6" height="8" viewbox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg" data-config-id="auto-svg-20-14">
                <path
                    d="M4.88663 3.52667L2.05996 0.700006C1.99799 0.637521 1.92425 0.587925 1.84301 0.554079C1.76177 0.520233 1.67464 0.502808 1.58663 0.502808C1.49862 0.502808 1.41148 0.520233 1.33024 0.554079C1.249 0.587925 1.17527 0.637521 1.1133 0.700006C0.989128 0.824915 0.919434 0.993883 0.919434 1.17001C0.919434 1.34613 0.989128 1.5151 1.1133 1.64001L3.4733 4.00001L1.1133 6.36001C0.989128 6.48491 0.919434 6.65388 0.919434 6.83001C0.919434 7.00613 0.989128 7.1751 1.1133 7.30001C1.17559 7.36179 1.24947 7.41068 1.33069 7.44385C1.41192 7.47703 1.49889 7.49385 1.58663 7.49334C1.67437 7.49385 1.76134 7.47703 1.84257 7.44385C1.92379 7.41068 1.99767 7.36179 2.05996 7.30001L4.88663 4.47334C4.94911 4.41136 4.99871 4.33763 5.03256 4.25639C5.0664 4.17515 5.08383 4.08801 5.08383 4.00001C5.08383 3.912 5.0664 3.82486 5.03256 3.74362C4.99871 3.66238 4.94911 3.58865 4.88663 3.52667Z"
                    fill="#A4AFBB"
                ></path>
            </svg>
            </a>';
        }

        echo '  </div>';
        echo '</div>';
    }
}
?>
                    
                    

                        
                            
                            
                            


                            
                            
                            