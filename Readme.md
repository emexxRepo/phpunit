# Doküman Örneği

$userRepo = new UserRepository();
$user = $userRepo->create('foo@bar.com', 'Foo Bar');
echo $user->email;  // foo@bar.com
echo $user->name;   // Foo Bar  