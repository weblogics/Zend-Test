<?
include('inc/bootstrap.php');

# Open ACL.txt for file handling
$file = new File('ACL.txt');

# Do some crazy Access Control Management here
$user = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 1;

$ac->addRole(new Zend_Acl_Role('guest'))
    ->addRole(new Zend_Acl_Role('member'))
    ->addRole(new Zend_Acl_Role('admin'));
 
if($user == 1)
{
    $ac->addRole(new Zend_Acl_Role(1), array('guest', 'member', 'admin')); # Only applies to User 1
}
elseif($user == 2)
{
    $ac->addRole(new Zend_Acl_Role(2), array('guest', 'member')); # Only applies to User 2
}
else
{
    $ac->addRole(new Zend_Acl_Role($user));
}
 
$ac->add(new Zend_Acl_Resource('members'));
$ac->add(new Zend_Acl_Resource('admin'));

$ac->allow('member', 'members');
$ac->allow('admin', 'admin');

# Done with setting who has access to what? Cool, write to file.
$file->Write(serialize($ac));

# Wanna know who has access to what? Cool, Read the ACL file.
$serialized_acl = $file->Read();

# Unserialize that shit for use.
$acl = unserialize($serialized_acl);

/**/
if( $acl->isAllowed($user, 'admin') )
{
    echo 'User <b>'. $user. '</b> has access to admin.<br />';
}

if( $acl->isAllowed($user, 'members') )
{
    echo 'User <b>'. $user. '</b> has access to members section.<br />';
}
/**/