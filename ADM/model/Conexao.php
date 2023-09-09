<?php 
    class Conexao{

    public $db = "retroville";
    public $user = "root";
    public $host = "localhost";
    public $pass = "";

    public function executar($sql){
        $conexao = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        $executar = mysqli_query($conexao, $sql);
        if (!$conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        mysqli_close($conexao);
    }   

    public function consultarDados($sql) {
        $conexao = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        $resultado = mysqli_query($conexao, $sql);
        if (!$conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $dados = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $dados[] = $row;
        }

        mysqli_close($conexao);

        return $dados;
    }
    /*public function validar($sql){
        session_start();
        $conexao = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        $executar = mysqli_query($conexao, $sql);
        if (!$conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(!$dados = mysqli_fetch_array($executar)){
            echo 'não entrou';
            //session_destroy();
        }

        while($dados = mysqli_fetch_array($executar)){
            $_SESSION['ID'] = $dados['id'];
            $_SESSION['EMAIL'] = $dados['email'];
            $_SESSION['SENHA'] = $dados['senha'];
        }
        
        var_dump($_SESSION['EMAIL']);
        
        mysqli_close($conexao);
    }*/
    public function validar($sql) {
        $conexao = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        
        if (!$conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $executar = mysqli_query($conexao, $sql);
        
        if (!$executar) {
            die("Query failed: " . mysqli_error($conexao));
        }
        
        session_start(); // Start the session
        
        if ($dados = mysqli_fetch_array($executar)) {
            $_SESSION['ID'] = $dados['id'];
            $_SESSION['EMAIL'] = $dados['email'];
            $_SESSION['SENHA'] = $dados['senha'];
            header('Location: ../view/home.php');
            
            
            // $_SESSION['user_data'][] = array('ID' => $dados['id'], 'EMAIL' => $dados['email'], 'SENHA' => $dados['senha']);
        } else {
            
            session_destroy();
            //header('Location: ../index.php');
            ?>
            <form action="../index.php" method="post" name="formMsg" id="formMsg">
                <input type="hidden" name="msg">
            </form>
            <script>
                var form = document.getElementById('formMsg');
                form.submit();
            </script>
            <?php
        }
        
        //var_dump($_SESSION['EMAIL']);
        
        mysqli_close($conexao);
    }
    


    
}

?>