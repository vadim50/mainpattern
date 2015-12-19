<?php 
include_once ROOT. '/models/News.php';

	class NewsController
	{
		public function actionIndex()
		{
			$newsList = array();
			$newsList = News::getNewsList();

			require_once(ROOT. '/views/news/index.php');

			return true;

		}
		public function actionView($id)
		{
			if ($id)
			{
                                $newsItem = array();
				$newsItem = News::getNewsItemById($id);

//				echo '<pre>';
//				print_r($newsItem);
//				echo '</pre>';

                        require_once(ROOT. '/views/news/newsItem.php');        
                                
				echo 'actionView';
			}
			
                                
			return true;
		}
	}
 ?>