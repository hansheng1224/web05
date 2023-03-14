<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
    protected $dsn='mysql:host=localhost;charset=utf8;dbname=db01';
    protected $t,$pdo;
   

    public function __construct($a)
    {
        $this->t=$a;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    private function atsa($a){
        foreach($a as $k=>$v){
            $tmp[]="`$k`='$v'";
        }
        return $tmp;
    }

    public function find($a){
        $sql="select * from $this->t ";
        if(is_array($a)){
            $tmp=$this->atsa($a);
            $sql=$sql." where ".join(" && ",$tmp);
        }else{
            $sql=$sql." where `id`='$a'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$a){
        $sql="select * from $this->t ";
        if(isset($a[0])){
        if(is_array($a[0])){
            $tmp=$this->atsa($a[0]);
            $sql=$sql." where ".join(" && ",$tmp);
        }else{
            $sql=$sql.$a[0];
        }
        if(isset($a[1])){
            $sql=$sql.$a[1];
        }
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($a){
        if(isset($a['id'])){
            $id=$a['id'];
            unset($a['id']);
            $tmp=$this->atsa($a);
            $sql="update $this->t set ".join(",",$tmp)." where `id`='$id'";
        }else{
            $col=array_keys($a);
            $sql="insert into $this->t (`".join("`,`",$col)."`) values ('".join("','",$a)."')";
        }
        $this->pdo->exec($sql);
    }

    public function del($a){
        $sql="delete from $this->t ";
        if(is_array($a)){
            $tmp=$this->atsa($a);
            $sql=$sql." where ".join(" && ",$tmp);
        }else{
            $sql=$sql." where `id`='$a'";
        }
        $this->pdo->exec($sql);
    }


    private function math($m,...$a){
        switch($m){
            case 'count':
                $sql="select count(*) from $this->t ";
                if(isset($a[0])){
                    $con=$a[0];
                }
            break;
            default:
                $col=$a[0];
                if(isset($a[1])){
                    $con=$a[1];
                }
                $sql="select $m($col) from $this->t ";
        }
        if(isset($con)){
            if(is_array($con)){
                $tmp=$this->atsa($con);
                $sql=$sql." where ".join(" && ",$tmp);
            }else{
                $sql=$sql.$con;
            }
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    

    public function count(...$a){
        return $this->math('count',...$a);
    }

    public function sum($m,...$a){
        return $this->math('sum',$m,...$a);
    }

    public function max($m,...$a){
        return $this->math('max',$m,...$a);
    }

    public function min($m,...$a){
        return $this->math('min',$m,...$a);
    }

    public function avg($m,...$a){
        return $this->math('avg',$m,...$a);
    }

}

function dd($a){
echo "<pre>";
print_r($a);
echo "</pre>";
}

function to($url){
    header("location:".$url);
}

$Title=new DB('title');
$Total=new DB('total');
$Bottom=new DB('bottom');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$Bottom=new DB('bottom');
$News=new DB('news');
$Admin=new DB("admin");
$Menu=new DB('menu');
?>