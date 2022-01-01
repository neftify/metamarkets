const renderedCharts = [];
function updateCharts() {
    if (typeof ApexCharts !== 'function') {
        return;
    }

    const chartElements = document.querySelectorAll('.chart');

    chartElements.forEach((chartElement) => {
        if (renderedCharts.includes(chartElement)) {
            return;
        }

        const type = chartElement.getAttribute('data-type');
        const variant = chartElement.getAttribute('data-variant');

        if (typeof demoOptions[type] === 'object') {
            let options = demoOptions[type];

            if (typeof options['__variants'] === 'object' && typeof options['__variants'][variant] === 'object') {
                options = { ...options, ...options['__variants'][variant] };
            }

            const chart = new ApexCharts(chartElement, options);
            chart.render();
            renderedCharts.push(chartElement);
        }
    });
}

updateCharts();
