# StratusPro

## Apresentação

O StratusPro é uma plataforma inovadora e modular, criada para atender às necessidades dos órgãos públicos. Desenvolvido para ser altamente eficiente e seguro, o StratusPro integra diversos departamentos e otimiza a gestão pública, proporcionando estabilidade, agilidade e resultados duradouros.

Com uma arquitetura flexível e tecnologia de ponta, o sistema se adapta às demandas de cada órgão, simplificando processos e fortalecendo o controle interno. A solução não só facilita o gerenciamento, mas também garante maior eficiência, contribuindo para a tomada de decisões estratégicas e a melhoria contínua das operações públicas.

## Instalação

Para clonar um repositório para o seu repositório local, siga os seguintes passos:

<ol>
    <li>Abra o terminal ou prompt de comando no seu computador.</li>
    <li>Navegue até o diretório onde deseja clonar o repositório. Você pode usar o comando 'cd' seguido do caminho do diretório para navegar até ele.</li>
    <li>No GitHub, acesse o repositório que deseja clonar.</li>
    <li>Clique no botão "Code" (ou "Código") e copie a URL do repositório.</li>
    <li>Volte ao terminal ou prompt de comando e digite o comando git clone seguido da URL do repositório.</li>
</ol>

    git clone https://github.com/matheus1696/stratuspro.git

Para instalar dependências em um projeto, siga os seguintes passos:

    composer install

Setup configuração: Configurações sobre o nome do projeto, banco de dados e mais.

    cp .env.example .env

Gerar chave key da aplicação:

    php artisan key:generate

Migration - para criação de tabelas automáticas do sistema:

    php artisan migrate --seed

Iniciando sistema

    php artisan serve

## Usuários Padrões do Sistema

Usuários: `sysadmin@stratuspro.com.br` <br>
Senha: `sysadmin`

Usuários: `user@stratuspro.com.br` <br>
Senha: `user`

## Bibliotecas Utilizadas no Projeto

- Painel de Administração AdminLTE: https://jeroennoten.github.io/Laravel-AdminLTE/
- Livewire: https://livewire.laravel.com/docs/quickstart
- Tradução das mensagens para Laravel: https://github.com/lucascudo/laravel-pt-BR-localization
- Validadação PT-BR: https://github.com/LaravelLegends/pt-br-validator
- Gerenciamento de Permissões: https://spatie.be/
