document.addEventListener("DOMContentLoaded", function () {
    const ctx4 = document.getElementById('myNewChart2').getContext('2d');

    function updateChart2(data) {
        const daysOfWeek2 = Object.keys(data);
        const usageCounts2 = Object.values(data);

        let myNewChart2 = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: ['Quinta-feira', 'Sexta-feira', 'Sábado'],
                datasets: [{
                    label: 'Aparelhos Utilizados por Dia da Semana',
                    data: usageCounts2,
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
    fetch('java/get_data4.php')
        .then(response => response.json())
        .then(data => {
            updateChart2(data);
        })
        .catch(error => console.error('Erro ao buscar dados do servidor:', error));
});
