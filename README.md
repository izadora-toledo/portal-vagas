<h1>Projeto PORTAL DE VAGAS</h1>
Este é um projeto em PHP desenvolvido utilizando Laravel 8.0.

<h3>Pré-requisitos</h3>
Antes de começar, é necessário ter instalado em sua máquina:

XAMPP versão 8.2 ou superior
PHP 8.2 obrigatório
Composer 2.5 ou superior
MySQL (ele será instalado junto com o xampp, é só manter as configurações de instalação do xampp padrão)
Visual Studio Code
Git

<h4>Instalando o Visual Studio Code</h4>

* Acesse o site oficial do Visual Studio Code em https://code.visualstudio.com/.
* Clique no botão "Download" na página inicial.
* O download deve iniciar automaticamente. Caso contrário, clique em "Download for Windows".
* Após o download, execute o instalador do Visual Studio Code (arquivo com extensão .exe)
* Faça a instalação dele normalmente.

<h4>Instalando o Git</h4>

* Baixe o instalador do Git em https://git-scm.com/download/win.
* Execute o instalador baixado.
* Siga as instruções na tela para instalar o Git com as configurações padrão.
* Quando a instalação estiver concluída, abra o cmd e verifique se o Git está instalado digitando "git --version" no prompt de comando. Se a instalação foi bem-sucedida, você verá a versão do Git instalada.

<h4>Instalação do XAMPP</h4>
Para instalar o XAMPP, siga os seguintes passos:

* Acesse o site oficial do XAMPP (https://www.apachefriends.org/index.html) e faça o download da versão mais recente do XAMPP para o seu sistema operacional.
* Abra o arquivo de instalação e siga as instruções do assistente de instalação. (Não troque o caminho onde ele vai instalar o xampp, deixe exatamente como está).
* Selecione a opção de instalação do PHP 8.2 durante a instalação.

Pronto, Xampp e PHP instalados com sucesso.

Atualizando XAMPP (esse passo é somente se você já tiver o XAMPP na sua máquina)
Caso você já tenha instalado uma versão anterior do XAMPP, siga os seguintes passos para atualizá-lo:

* Faça o download da versão mais recente do XAMPP.
* Desinstale a versão anterior do XAMPP.
* Instale a nova versão do XAMPP.

Pronto, Xampp atualizado com sucesso.

<h4>Executando o Xampp</h4>

* Vá na pasta onde o xampp foi instalado: C:\xampp e procure pelo arquivo xampp-control e clique nele pra abrir.
* Ele vai abrir um menu de controle e você vai clicar em start no Apache e no MySQL.

<h5>Lembrando que o MySQL deve ter as mesmas portas do arquivo .env do projeto que será clonado, então configure seu MySQL do xampp usando esses acessos:</h5>

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

<h4>Clonando o Projeto Portal de Vagas do meu git para a sua máquina, siga o passo a passo:</h4>

* Abra o prompt de comando e execute o seguinte comando:
cd C:\xampp\htdocs

* Depois execute:
git clone https://github.com/izadora-toledo/portal-vagas.git

* Aguarde até que o processo de clonagem seja concluído.

* Depois de clonar o projeto do Git, você precisará instalar as dependências do projeto usando o Composer. Para fazer isso, siga estes passos:

* Abra o prompt de comando e ou terminal e execute esse comando:
cd C:\xampp\htdocs\portal-vagas\portal

* Verifique se o Composer está instalado em sua máquina digitando composer -v.

* Caso ele já esteja, execute o comando: 
composer install. 
* Depois execute:
composer update

<h3>Isso instalará todas as dependências do projeto especificadas no arquivo composer.json e criará um diretório vendor na raiz do projeto. Pode ir agora para o passo a passo de EXECUÇÃO DO PROJETO e pular as instruções abaixo de instalação.</h3>

<h6>CASO DÊ ALGUM PROBLEMA COM O PASSO A PASSO DA INSTALAÇÃO DAS DEPENDÊNCIAS DO PROJETO INSTALE o LARAVEL, COMPOSER separadamente seguindo as instruções abaixo.</h6>

<h4>Instalando o Composer (é necessário ter instalado o php junto com o xampp)</h4>

* Crie uma pasta com o nome portal-vagas dentro desse diretório do xampp C:\xampp\htdocs
* Dentro da pasta portal-vagas crie outra pasta com o nome portal
* Abra o prompt de comando do Windows.
* Navegue até o diretório esse diretório: C:\xampp\htdocs\portal-vagas\portal
* Execute o seguinte comando:
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

* Em seguida, execute o segundo comando:
php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

* Se o script de instalação passar na verificação de integridade, execute o seguinte comando para instalar o Composer:
php composer-setup.php --install-dir=bin --filename=composer

* Agora remova o script de instalação com o seguinte comando:
php -r "unlink('composer-setup.php');"

Pronto, Composer instalado com sucesso.

Atualizando o PHP pra PHP 8.2 (esse passo é somente se você já tiver o PHP na sua máquina)
* Execute o comando no terminal ou prompt de comando pra saber a versão atual do seu PHP:
php -v

* Certifique-se de que o Composer esteja instalado em seu computador. Você pode verificar se o Composer está instalado executando o seguinte comando:
composer -v

* Abra o terminal ou prompt de comando e navegue até o diretório raiz do projeto que requer a versão 8.2 do PHP.
* Execute o seguinte comando para instalar a versão 8.2 do PHP usando o Composer:
composer require php:^8.2

* Aguarde até que o Composer baixe e instale a nova versão do PHP. Quando a instalação for concluída, verifique se a nova versão do PHP está instalada corretamente, executando o comando php -v novamente.

Pronto, PHP 8.2 atualizado com sucesso.

<h4>Instalação do Laravel 8.0</h4>
Para instalar o Laravel 8.0, siga os seguintes passos:

* Abra o terminal ou prompt de comando e navegue até o diretório raiz do projeto (C:\xampp\htdocs\portal-vagas\portal).
* Execute o seguinte comando para instalar o Laravel:
composer create-project --prefer-dist laravel/laravel:^8.0 portal

Pronto, Laravel 8.0 instalado com sucesso.

<h1>EXECUTANDO O PROJETO</h1>

<h5>OBS: O projeto infelizmente ficou incompleto por eu ter pouco tempo por causa do meu trabalho na semana, mas me esforcei e fiz o máximo que deu. O projeto não vai ter os candidatos, existe a tabela com eles e etc, mas não tem a lista e o crud deles. Somente o crud de vagas com todas as funcionalidades solicitadas e devidas restrições. </h5>

* Abra o sistema de controle do Xampp e clique em Admin que se refere ao MySQL
* Ele vai abrir o phpMyAdmin no seu navegador, clique em Novo no menu lateral a esquerda e crie um banco de dados com o nome laravel e a configuração do utf8 exatamente como está abaixo:

nome da base de dados: laravel<br>
codificação: utf8mb4_unicode_ci

* No prompt de comando dentro da pasta raiz do projeto (C:\xampp\htdocs\portal-vagas\portal), execute o comando responsável por abrir o vscode:
code .

* Abra o terminal do vscode e execute o comando:
php artisan migrate

* Agora execute:
php artisan db:seed

* Atualize o seu navegador onde criou o banco de dados com o nome de laravel, clique em cima dele e veja se as tabelas e registros foram criados.

* Após isso, vamos iniciar o servidor, execute:
php artisan serve

* Para acessar o projeto copie no seu navegador essa URL: http://localhost:8000/welcome

* Para acessar o usuário admin, use:

email : admin@gmail.com<br>
senha: 12345678

<h5>Lembrando que na listagem das vagas, quando você for admin, vai aparecer todos os botões no menu dropdown, e quando você estiver deslogado, aparecerá apenas o botão Candidata-se.</h5>

<h4>RODANDO TESTES</h4>
Os testes se encontram na pasta tests
Não poderemos rodar os testes, pois eu tive alguns problemas de incompatibildiade durante a semana e não consegui resolver a tempo, mas criei dois TesteUser.php na pasta tests/unit e outro na pasta tests/features com o nome de TesteCriacaoVagaTest.php.

<h4>RODANDO DOCKER</h4>
Não consegui colocar o laradock pra funcionar, então decidi por não instalar, mesmo tentando usar o ambiente linux, o meu pc ficou muito lento e travando, aí preferi fazer sem.

<h5>Agradeço pela oportunidade, tenho muito a melhorar, mas quero dizer que informei na entrevista que estou estudando laravel e docker agora, então foi algo novo pra mim e eu tive minhas dificuldades e a falta de tempo porque eu trabalho durante a semana. Mas foi uma excelente experiência e eu adoraria aprender mais coisas com vocês e melhorar tudo que já sei :)</h5>
