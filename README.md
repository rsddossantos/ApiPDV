## <center>Ap<b>iPDV</b></center>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

API em Laravel que irá devolver mensagens em formato JSON para um CRUD de funcionários.
<br>Possui autenticação JWT e contém também métodos para login, logout e refresh do token.<br>
Apesar de não ser usual e visando facilitar a avaliação desse teste, dentro do mesmo projeto temos uma singela
interface para efetuar as tarefas solicitadas, que irá acionar os endpoints da api através do Ajax.

<hr>

### Instruções:

- Clonar o projeto
- Atualizar as dependências:<br><br>
  <code>composer install</code>
  <br><br>
- Renomear arquivo <strong>.env.example</strong> para <strong>.env</strong>
- Gerar chave da aplicação:<br><br>
  <code>php artisan key:generate</code>
  <br><br>
- Gerar secret do autenticador JWT:<br><br>
  <code>php artisan jwt:secret</code>
  <br><br>
- Criar base em MySql com nome <strong>apipdv</strong>. Recomendado utilizar collation UTF8MB4_UNICODE_CI
- Importar o dump para criar a estrutura e dados iniciais, arquivo <strong>apipdv.sql</strong> na raiz do projeto
- Alterar as credenciais do seu banco no arquivo <strong>.env</strong>
- Subir o serviço:<br><br>
  <code>php artisan serve</code>  
  
<hr>

### Relacionamento Dataset:

![relacionamento_bd](https://user-images.githubusercontent.com/61060100/120015804-275a8c80-bfba-11eb-99c0-46865976f65f.png)

<hr>

### Funcionamento e Endpoits:

- O teste com a API pode ser feito separadamente, usando alguma ferramenta de consumo, como por exemplo o site https://resttesttest.com/

- Os endpoits e parâmetros podem ser visualizados pelo arquivo <strong>routes/api.php</strong>

EXEMPLO

![image](https://user-images.githubusercontent.com/61060100/119753381-12c0ac00-be75-11eb-873a-e1ac9f84e1c8.png)

- O token expira em 60 minutos.

- O cadastramento do usuário, que aqui também consideramos ser um funcionário, pode ser feito previamente na tela de login->register,
e o cadastro pode ser atualizado posteriormente.




  

