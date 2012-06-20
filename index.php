<?
include('inc/bootstrap.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
include('modules/forum.module.php');

$module = new ForumModule($db);

if($page == 'home')
{
    debug($module->ListForums());
    
    foreach($module->ListForums() as $id => $forum)
    {
        //
    }
    
    $forum = $module->Forum(2);
    
    echo '<p><strong><a href="./?page=forum&id='.$forum['id'].'">'.$forum['name'].'</a></strong><br /></p>';
}
else
{
    
}

/*
The Forum Module exists out of Forums, each forum has it's own custom id, title description etc.
*/
