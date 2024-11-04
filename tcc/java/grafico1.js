document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart;

    function updateChart(selectedDay) {
        fetch(`java/get_data.php?selectedDay=${selectedDay}`)
            .then(response => response.json())
            .then(data => {
                if (myChart) {
                    myChart.destroy(); // Destrua o gráfico anterior se existir
                }

                const machineNames = data.map(item => item.Nome_Maquina);
                const usageCounts = data.map(item => item.quantidade_utilizada);

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: machineNames,
                        datasets: [{
                            label: `Quantidade de Utilizações por Aparelho no dia ${selectedDay}`,
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
                                    text: 'Quantidade de Utilizações' // Rótulo do eixo Y
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Aparelhos' // Rótulo do eixo X
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Erro ao buscar dados do servidor:', error));
    }

    const daySelect = document.getElementById("dataSelect");
    daySelect.addEventListener("change", function () {
        const selectedDay = daySelect.value;
        updateChart(selectedDay);
    });

    // Chame a função inicialmente para criar o gráfico com a seleção inicial
    const initialSelectedDay = "Segunda-feira"; // Ou qualquer dia de sua escolha
    updateChart(initialSelectedDay);
});
