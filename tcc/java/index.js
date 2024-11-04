const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');
const darkModeToggle = document.querySelector('.dark-mode');
const body = document.querySelector('body');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkModeToggle.addEventListener('click', function() {
    toggleDarkMode();
});

Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
        <td class="primary">Details</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});

// Adicionar a classe 'dark-mode-variables' ao carregar a página
document.addEventListener("DOMContentLoaded", function() {
    body.classList.add('dark-mode-variables');
    darkModeToggle.querySelector('span:nth-child(1)').classList.remove('active');
    darkModeToggle.querySelector('span:nth-child(2)').classList.add('active');
    // Alterar a imagem de fundo
    body.style.setProperty('--background-image', "url('img/fundo.jpg')");
});

function toggleDarkMode() {
    body.classList.toggle('dark-mode-variables');
    darkModeToggle.querySelector('span:nth-child(1)').classList.toggle('active');
    darkModeToggle.querySelector('span:nth-child(2)').classList.toggle('active');

    // Alterar a imagem de fundo com base no modo escuro ativado ou desativado
    if (body.classList.contains('dark-mode-variables')) {
        body.style.setProperty('--background-image', "url('img/fundo.jpg')");
    } else {
        body.style.setProperty('--background-image', "url('img/fundoclaro.jpg')");
    }
}
