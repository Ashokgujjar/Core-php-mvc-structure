 <?php
 Class Home extends Controller
 {
 	protected = $user;
 	public function __construct()
 	{
 		$this->user = $this->model('User');
 	}
 	public function index()
 	{
 		$user->name = 'Rj';
 		echo $user->name;
 	}

 	public function create($username='',$email='')
 	{
 		$this->user->create([
				'username' => $username,
				'email' => $email
 			]);

 		/* or you can use below
			User::create([
				'username' => $username,
				'email' => $email
 			]);
 		*/
 	}
 }