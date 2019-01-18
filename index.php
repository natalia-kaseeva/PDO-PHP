<?php 

//$db=new PDO('mysql:host=localhost;dbname=mini-site','root','');

/*$sql="SELECT*FROM films";
$result=$db->query($sql);*/
/*echo "<h2>Вывод записей из результата по одной</h2>";

print_r($result->fetch(PDO::FETCH_ASSOC));
print_r($result->fetch(PDO::FETCH_ASSOC));

while ($film=$result->fetch(PDO::FETCH_ASSOC)) {
	//print_r($film);
	echo "Название фильма:" .$film['title']."<br>";
	echo "Жанр фильма:" .$film['genre']."<br>";
	echo "<br><br>";
}*/

/*echo "<hr />";*/
/*$sql="SELECT*FROM films";
$result=$db->query($sql);
$films=$result->fetchALL(PDO::FETCH_ASSOC);
 
 foreach ($films as $film) {
 	echo "Название фильма:" .$film['title']."<br>";
	echo "Жанр фильма:" .$film['genre']."<br>";
	echo "<br><br>";
 }*/

/*echo "<hr />";*/

/*$sql="SELECT*FROM films";
$result=$db->query($sql);

$result->bindColumn('id',$id);
$result->bindColumn('title',$title);
$result->bindColumn('genre',$genre);
$result->bindColumn('year',$year);

echo "<h2>Вывод записей с привязкой данных к переменным</h2>";
while ($result->fetch(PDO::FETCH_ASSOC)) {
	echo "ID: {$id} <br>";
	echo "Название: {$title} <br>";
	echo "Жанр: {$genre} <br>";
	echo "Год: {$year} <br>";
	echo "<br><br>";
}*/

// 1. Выборка записи без защиты от SQL инъекций

/*$username='joker';
$password='555';

$sql="SELECT*FROM users WHERE name='{$username}' AND password='{$password}' LIMIT 1";

$result=$db->query($sql);
print_r($result->fetch(PDO::FETCH_ASSOC));
print_r($result->fetch(PDO::FETCH_ASSOC));

if ($result->rowCount()==1) {
	$user=$result->fetch(PDO::FETCH_ASSOC);
	echo "Imy polsovately: {$user['name']} <br>";
	echo "Parol polsovately: {$user['password']} <br>";
}*/

// 2. Выборка с защитой от SQL инъекций - в ручном режиме

/*$username='joker';
$password='555';

$username=$db->quote($username);
$username=strtr($username,array('_'=>'_','%'=>'\%'));

$password=$db->quote($password);
$password=strtr($password,array('_'=>'_','%'=>'\%'));

$sql="SELECT*FROM users WHERE name='{$username}' AND password='{$password}' LIMIT 1";

$result=$db->query($sql);

if ($result->rowCount()==1) {
	$user=$result->fetch(PDO::FETCH_ASSOC);
	echo "Imy polsovately: {$user['name']} <br>";
	echo "Parol polsovately: {$user['password']} <br>";
}*/

//3. Выборка с защитой от SQL инъекций - в автоматическом режиме

/*$sql="SELECT*FROM users WHERE name=:username AND password=:password LIMIT 1";

$stmt=$db->prepare($sql);

$username='joker';
$password='555';

$stmt->blindValue(':username',$username);
$stmt->blindValue(':password',$password);
$stmt->execute();

//$smt->execute($array(':username'=>$username,':password'=>$password));

$stmt->blindColumn('name',$name);
$stmt->blindColumn('email',$email);

$stmt->fetch();
echo "Imy polsovately: {$name} <br>";
echo "Email polsovately: {$email} <br>";*/

//4. Выборка с защитой от SQL инъекций - в автоматическом режиме - другой формат запроса
/*$sql="SELECT*FROM users WHERE name=? AND password=? LIMIT 1";
$stmt=$db->prepare($sql);

/*$username='joker';
$password='555';*/

/*$stmt->blindValue(1,$username);
$stmt->blindValue(2,$password);
$stmt->execute();

$stmt->blindColumn('name',$name);
$stmt->blindColumn('email',$email);

$stmt->fetch();
echo "Imy polsovately: {$name} <br>";
echo "Email polsovately: {$email} <br>";*/


// Вставка данных в БД

/*$db=new PDO('mysql:host=localhost;dbname=mini-site','root','');

$sql="INSERT INTO users (name,email) VALUES (:name,:email)";
$stmt=$db->prepare($sql);

$username="Flash";
$useremail="flash@gmail.com";

$stmt->bindValue(':name',$username);
$stmt->bindValue(':email',$useremail);
$stmt->execute();

echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";
echo "<p>ID вставленной записи: ". $db->lastinsertId() ."</p>";*/

// Обновление данных
/*$db=new PDO('mysql:host=localhost;dbname=mini-site','root','');
$sql="UPDATE users SET name = :name, email=:email  WHERE id = :id";
$stmt=$db->prepare($sql);

$username="New Flash";
$useremail="flash@inbox.com";
$id='3';

$stmt->bindValue(':name',$username);
$stmt->bindValue(':email',$useremail);
$stmt->bindValue(':id',$id);

$stmt->execute();

echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";*/

// Удаление данных
$db=new PDO('mysql:host=localhost;dbname=mini-site','root','');
$sql="DELETE FROM users WHERE name = :name";
$stmt=$db->prepare($sql);

$username="Flash";

$stmt->bindValue(':name',$username);

$stmt->execute();

echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";

 ?>