<?php
require_once __DIR__ . '/../dao/UsuarioDAO.class.php';
require_once __DIR__ . '/../excecoes/LoginException.class.php';
require_once __DIR__ . '/../excecoes/CadastroPessoaException.class.php';
/**
 * 
 * Classe para negócio de usuário
 * 
 * @author Lucas Gabriel de Souza Dutra
 */
class UsuarioBO
{

    private $usuarioDAO;

    function UsuarioBO()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    /**
     * Método para realizar o login do 
     * usuário na base de dados
     * 
     */
    function login($usuario, $senha)
    {

        $pessoas = $this->usuarioDAO->getAllUsingFilter(['login' => $usuario, 'senha' => $senha]);
        if (empty($usuario)) {
            throw new LoginException('Usuário vazio');
        }
        if (empty($senha)) {
            throw new LoginException('Senha vazia');
        }
        if (empty($pessoas)) {
            throw new LoginException('Usuário e senha incorretos');
        }
        return $pessoas[0];
    }

    function cadastrarOuEditar(Usuario $usuario)
    {
        if (empty($usuario->getNome())) {
            throw new CadastroPessoaException("O campo nome não pode ser vazio");
        }
        if (empty($usuario->getUltimoNome())) {
            throw new CadastroPessoaException("O campo último nome não pode ser vazio");
        }
        if (empty($usuario->getCpf())) {
            throw new CadastroPessoaException("O campo CPF não pode ser vazio");
        }
        if (empty($usuario->getRg())) {
            throw new CadastroPessoaException("O campo RG não pode ser vazio");
        }
        if (empty($usuario->getDataNascimento())) {
            throw new CadastroPessoaException("O campo data de nascimento não pode ser vazio");
        }
        if (empty($usuario->getEndereco())) {
            throw new CadastroPessoaException("O campo endereço não pode ser vazio");
        }
        if (empty($usuario->getLogin())) {
            throw new CadastroPessoaException("O campo login não pode ser vazio");
        }
        if (empty($usuario->getSenha())) {
            throw new CadastroPessoaException("O campo senha não pode ser vazio");
        }
        if (empty($usuario->getEmail())) {
            throw new CadastroPessoaException("O campo e-mail não pode ser vazio");
        }
        if (empty($usuario->getId())) {
            $pessoas = $this->usuarioDAO->getAllUsingFilter(['login' => $usuario->getLogin()]);
            if (!empty($pessoas)) {
                throw new CadastroPessoaException("Já existe um usuário com o login preenchido");
            }
        } else {
            $pessoas = $this->usuarioDAO->getByFilter(
                'and',
                new Filter('id', '<>', $usuario->getId()),
                new Filter('login', '=', $usuario->getLogin())
            );
            if (!empty($pessoas)) {
                throw new CadastroPessoaException("Já existe um usuário com o login preenchido");
            }
        }
        $this->usuarioDAO->merge($usuario);
    }
}

?>