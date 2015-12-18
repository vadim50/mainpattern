<?php 

	class News
	{
		/**
		* Return single news item with specified id
		* @param integer $id
		*/

		public static function getNewsItemById($id)
		{
			$id = intval($id);

			if ($id)
			{

				$db = Db::getConnection();

				$result = $db->query('SELECT * from publication WHERE id=' . $id);

				//$result->setFetchMode(PDO::FETCH_NUM);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				$newsItem = $result->fetch();

				return $newsItem;


			}
		}

		/**
		*
		* Returns an array of news items
		*/

		public static function getNewsList()
		{
			// $host = 'localhost/z';
			// $dbname = 'testsite2';
			// $user = 'root';
			// $password = '';
			// $db = new PDO("mysql::host=$host;dbname=$dbname", $user, $password);

				$db = Db::getConnection();
				
			$newsList = array();

			$result = $db->query('SELECT id, title, date, short_content ' . ' FROM publication ' . ' ORDER BY date DESC ' . ' LIMIT 10');

			$i = 0;
			while($row = $result->fetch())
			{
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['title'] = $row['id'];
				$newsList[$i]['date'] = $row['date'];
				$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		}
	}
 ?>