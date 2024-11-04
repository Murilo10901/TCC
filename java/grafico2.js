document.addEventListener("DOMContentLoaded", function () {
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const daySelect2 = document.getElementById("dataSelect2");
    const timeSelect = document.getElementById("timeSelect");

    let myChart2;

    function updateChart(selectedDay, selectedTime) {
        fetch(`java/get_data2.php?selectedDay=${selectedDay}&selectedTime=${selectedTime}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); 

                const machineNames = data.map(item => item.Nome_Maquina);
                const usageCounts = data.map(item => item.quantidade_utilizada);

                if (myChart2) {
                    myChart2.destroy(); 
                }

                myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: machineNames, 
                        datasets: [{
                            label: `Utilizações por Hora: ${selectedDay}`,
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
                                    text: 'Quantidade de Utilizações'                            }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Aparelhos' 
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Erro ao buscar dados do servidor:', error));
    }

    daySelect2.addEventListener("change", function () {
        const selectedDay = daySelect2.value;
        const selectedTime = timeSelect.value; 
        updateChart(selectedDay, selectedTime);
    });

    timeSelect.addEventListener("change", function () {
        const selectedDay = daySelect2.value;
        const selectedTime = timeSelect.value;
        updateChart(selectedDay, selectedTime);
    });

    
    const initialSelectedDay = daySelect2.value;
    const initialSelectedTime = timeSelect.value;
    updateChart(initialSelectedDay, initialSelectedTime);
});
