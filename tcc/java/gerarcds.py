import qrcode
import os  # Importe a biblioteca 'os' para lidar com caminhos de diretórios

# Dados para os QR codes
dados_qr = [
    {
        "ID_Maquina": "1",
        "Nome_Maquina": "Esteira",
        "IMG": "https://exemplo.com/esteira.jpg",
        "Status": "Em uso"
    },
    {
        "ID_Maquina": "2",
        "Nome_Maquina": "Bicicleta Ergométrica",
        "IMG": "https://exemplo.com/bicicleta.jpg",
        "Status": "Em uso"
    },
    # Adicione os dados para as outras máquinas
]

# Diretório onde os QR codes serão salvos
diretorio_qrcodes = "qrcodes"  # Ajuste para o diretório correto

# Garanta que o diretório existe ou crie-o se necessário
if not os.path.exists(diretorio_qrcodes):
    os.makedirs(diretorio_qrcodes)

# Gerar e salvar os QR codes
for i, dados in enumerate(dados_qr):
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    qr.add_data(dados)
    qr.make(fit=True)

    # Nome do arquivo
    filename = os.path.join(diretorio_qrcodes, f'qrcode_{i}.png')  # Construa o caminho do arquivo

    # Salvar o QR code como uma imagem PNG
    img = qr.make_image(fill_color="black", back_color="white")
    img.save(filename)
    print(f'QR Code {i} gerado com sucesso.')
