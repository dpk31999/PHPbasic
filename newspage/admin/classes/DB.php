<?php

// Lớp database
class DB
{
	private $hostname = 'localhost',
			$username = 'root',
			$password = 'password',
			$dbname = 'newspage';

	public $cn = NULL;

	public function connect()
	{
		$this->cn = mysqli_connect('localhost', 'root', 'password', 'newspage');
	}

	public function close()
	{
	    if ($this->cn)
	    {
	        mysqli_close($this->cn);
	    }
	}

	public function query($sql = null) 
	{		
	    if ($this->cn)
	    {
			mysqli_query($this->cn, $sql);
	    }
	}

	public function num_rows($sql = null) 
	{
		if ($this->cn)
		{
			$query = mysqli_query($this->cn, $sql);
			if ($query)
			{
				$row = mysqli_num_rows($query);
				return $row;
			}	
		}		
	}

	public function fetch_assoc($sql = null, $type)
	{
		if ($this->cn)
		{
			$query = mysqli_query($this->cn, $sql);
			if ($query)
			{
				if ($type == 0)
				{
					while ($row = mysqli_fetch_assoc($query))
					{
						$data[] = $row;
					}
					return $data;
				}
				else if ($type == 1)
				{
					$data = mysqli_fetch_assoc($query);
					return $data;
				}
			}		
		}
	}

	public function insert_id()
	{
		if ($this->cn)
		{
			$count = mysqli_insert_id($this->cn);
			if ($count == '0')
			{
				$count = '1';
			}
			else
			{
				$count = $count;
			}
			return $count;
		}
	}

	public function set_char($uni)
	{
		if ($this->cn)
		{
			mysqli_set_charset($this->cn, $uni);
		}
	}
}

?>