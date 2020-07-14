<?php

$config = array(

    'admin' => array(
        'core:AdminPassword',
    ),

    'example-userpass' => array(
        'exampleauth:UserPass',
        'user.field:password' => array(
            'cn' => 'User FIELD',
            'displayName' => 'FIELD, User',
            'uid' => array('user.field@enabel.be'),
            'employeeNumber' => "1",
            'mail' => 'user.field@enabel.be',
            'givenName' => 'User',
            'sn' => 'FIELD',
            'objectClass' => 'inetOrgPerson',
            'initials' => 'M',
            'title' => 'User field test',
            'userPassword' => '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=',
        ),
        'user.hq:password' => array(
            'cn' => 'User HQ',
            'displayName' => 'HQ, User',
            'uid' => array('user.hq@enabel.be'),
            'employeeNumber' => "2",
            'mail' => 'user.hq@enabel.be',
            'givenName' => 'User',
            'sn' => 'HQ',
            'objectClass' => 'inetOrgPerson',
            'initials' => 'F',
            'title' => 'User hq test',
            'userPassword' => '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=',
        ),
    ),

);
