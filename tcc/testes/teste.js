// seu_script.js

// Dados do gráfico
/*const data = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
    datasets: [
        {
            label: 'Dados 1',
            data: [12, 19, 3, 5, 2],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            hidden: false // Inicialmente visível
        },
        {
            label: 'Dados 2',
            data: [5, 8, 2, 8, 10],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            hidden: false // Inicialmente visível
        }
    ]
};

const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
});

// Atualiza o gráfico com base no estado das checkboxes
function updateChart() {
    myChart.data.datasets[0].hidden = !document.getElementById('showData1').checked;
    myChart.data.datasets[1].hidden = !document.getElementById('showData2').checked;
    myChart.update();
}

// Associe a função de atualização às mudanças nas checkboxes
document.getElementById('showData1').addEventListener('change', updateChart);
document.getElementById('showData2').addEventListener('change', updateChart);*/
// seu_script.js
/*----------------------------------------------------------------------------------*/





// Dados iniciais do gráfico principal (quantidade de aparelhos utilizados por dia)
const initialData = {
    segunda: [10, 15, 8, 5], // Exemplo de dados para segunda-feira
    terca: [8, 12, 6, 7],   // Exemplo de dados para terça-feira
    quarta: [9, 14, 7, 6],  // Exemplo de dados para quarta-feira
    quinta: [11, 16, 9, 4], // Exemplo de dados para quinta-feira
    sexta: [12, 13, 10, 3], // Exemplo de dados para sexta-feira
};

// Função para criar um gráfico de barras
function createBarChart(labels, data, containerId) {
    const ctx = document.getElementById(containerId).getContext('2d');
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }]
        },
    });
}

// Função para atualizar o gráfico principal com base na seleção da combobox
function updateMainChart() {
    const selectedDay = document.getElementById('daySelect').value;
    const labels = ['Aparelho 1', 'Aparelho 2', 'Aparelho 3', 'Aparelho 4']; // Nomes dos aparelhos
    const data = initialData[selectedDay]; // Dados do dia selecionado

    if (window.mainChart) {
        window.mainChart.destroy();
    }

    // Crie o gráfico principal
    window.mainChart = createBarChart(labels, data, 'mainChart');

    // Limpe o gráfico de detalhes
    document.getElementById('detailChartContainer').innerHTML = '';
}

// Função para criar e exibir o gráfico de detalhes quando uma barra é clicada
function showDetailChart(barIndex) {
    const selectedDay = document.getElementById('daySelect').value;
    const label = `Aparelho ${barIndex + 1}`;
    const data = initialData[selectedDay][barIndex];

    const detailChartContainer = document.getElementById('detailChartContainer');
    detailChartContainer.innerHTML = `<h3>${label} - Detalhes</h3><canvas id="detailChart"></canvas>`;

    // Crie o gráfico de detalhes
    createBarChart([label], [data], 'detailChart');
}

// Chame a função para criar o gráfico principal inicialmente
updateMainChart();

// Associe a função à mudança na combobox
document.getElementById('daySelect').addEventListener('change', updateMainChart);

// Adicione um evento de clique ao gráfico principal para mostrar os detalhes
document.getElementById('mainChart').onclick = function(event, elements) {
    if (elements && elements.length > 0) {
        const clickedIndex = elements[0]._index;
        showDetailChart(clickedIndex);
    }
};

