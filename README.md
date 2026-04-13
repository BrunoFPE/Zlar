# Zlar# Zlar

Sistema web simples para cadastro e gerenciamento de moradores, desenvolvido com HTML, CSS, JavaScript, PHP e MySQL.

---

## Descrição

O Zlar é um projeto CRUD (Create, Read, Update, Delete) que permite:

* Cadastrar moradores
* Listar moradores cadastrados
* Editar informações
* Excluir registros

O sistema utiliza um formulário web para entrada de dados e integração com banco de dados MySQL.

---

## Tecnologias utilizadas

* HTML5
* CSS3
* JavaScript
* PHP
* MySQL
* XAMPP (Apache + MySQL)

---

## Estrutura do projeto

```
Zlar/
├── home/
│   ├── cadastro_morador.html
│   └── lista.php
├── js/
│   └── morador_novo.js
├── php/
│   ├── conexao.php
│   ├── cadastrar.php
│   ├── editar.php
│   ├── atualizar.php
│   └── excluir.php
├── css/
│   └── style.css
├── zlar.sql
└── README.md
```

---

## Funcionalidades

### Cadastro

Permite inserir:

* Nome
* Endereço
* E-mail
* Senha
* Telefone

### Listagem

Exibe todos os moradores cadastrados no banco.

### Edição

Atualiza os dados de um morador existente.

### Exclusão

Remove um morador do sistema.

---

## Como executar o projeto

### 1. Instalar o XAMPP

Certifique-se de que Apache e MySQL estão ativos.

### 2. Clonar o repositório

```
git clone https://github.com/BrunoFPE/Zlar.git
```

### 3. Mover para o diretório do XAMPP

Coloque a pasta dentro de:

```
C:\xampp\htdocs\
```

---

### 4. Criar o banco de dados

Acesse:

```
http://localhost/phpmyadmin
```

Crie um banco chamado:

```
zlar
```

Depois execute o script SQL:

```
CREATE TABLE morador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(200),
    email VARCHAR(100),
    senha VARCHAR(255),
    telefone VARCHAR(20)
);
```

---

### 5. Configurar conexão

Arquivo:

```
php/conexao.php
```

Verifique:

```
$host = "localhost";
$user = "root";
$password = "";
$db = "zlar";
```

---

### 6. Executar o sistema

Acesse no navegador:

```
http://localhost/Zlar/home/cadastro_morador.html
```

---

## Observações

* O sistema não possui autenticação (login) nesta versão
* Validações são básicas
* Projeto com foco didático para aprendizado de CRUD

---

## Melhorias futuras

* Implementação de login
* Validação de dados no backend
* Criptografia de senha
* Interface mais avançada
* API REST

---

## Autor

Bruno Perondi

---

## Licença

Este projeto é livre para uso acadêmico e estudos.
