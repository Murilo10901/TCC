document.addEventListener("DOMContentLoaded", function () {
    const ctx3 = document.getElementById('myNewChart').getContext('2d');

    function updateChart(data) {
        const daysOfWeek = Object.keys(data);
        const usageCounts = Object.values(data);

        let myNewChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira'],
                datasets: [{
                    label: 'Aparelhos Utilizados por Dia da Semana',
                    data: usageCounts,
                    backgroundColor: 'RGB(138, 43, 226, 0.2)',
                    borderColor: 'RGB(148, 0, 211, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantidade de Aparelhos Utilizados' // Rótulo do eixo Y
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Dia da Semana' // Rótulo do eixo X
                        }
                    }
                }
            }
        });
    }

    // Fazer uma requisição para o PHP para obter os dados reais
    fetch('java/get_data3.php')
        .then(response => response.json())
        .then(data => {
            updateChart(data);
        })
        .catch(error => console.error('Erro ao buscar dados do servidor:', error));
});
