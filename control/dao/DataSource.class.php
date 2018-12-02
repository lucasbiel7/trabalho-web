<?php



/**
 * Classe criada para realizar a 
 * conexão com banco de dados
 * 
 */
class DataSource
{
    private $usuario;
    private $senha;
    private $endereco;
    private $porta;
    private $banco;

    public function DataSource()
    {
        $this->usuario = 'trabalhoFinal';
        $this->senha = 'trabalhoFinal';
        $this->endereco = 'localhost';
        $this->porta = 3306;
        $this->banco = 'trabalho_final_php';
    }

    protected function getConexao()
    {
        $conexao = "mysql:host=$this->endereco:$this->porta;dbname=$this->banco";
        return new PDO($conexao, $this->usuario, $this->senha);
    }
}
?>