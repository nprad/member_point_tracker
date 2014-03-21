create table usercache (
        objectId varchar(30) not null,
        name varchar(80) not null,
        primary key(objectId)
    );

create table points_periods (
        _id int unsigned not null auto_increment,
        name varchar(80) not null,
        starts datetime not null,
        ends datetime not null,
        event_points int not null,
        fundraising_points int not null,
        meeting_points int not null,
        social_points int not null,
        active tinyint(1) not null default 0,
        created_at timestamp default CURRENT_TIMESTAMP,
        updated_at timestamp,
        primary key (_id)
    );

create table events (
        _id int unsigned not null auto_increment,
        name varchar(80) not null,
        point_type int(2) not null,        
        points_period int unsigned not null,
        creator varchar(30) not null,
        eventDate datetime not null,
        created_at timestamp default CURRENT_TIMESTAMP,
        updated_at timestamp,
        primary key (_id),
        foreign key (points_period) references points_periods(_id) on delete cascade,
        foreign key (creator) references usercache(objectId) on delete cascade
    );

create table verification_requests (
        _id int unsigned not null auto_increment,
        event int unsigned not null,
        status int not null,
        requester varchar(30) not null,
        created_at timestamp default CURRENT_TIMESTAMP,
        updated_at timestamp,
        primary key (_id),
        foreign key (event) references events(_id) on delete cascade,
        foreign key (requester) references usercache(objectId) on delete cascade
    );

create table messages (
        _id int unsigned not null auto_increment,
        sender varchar(30) not null,
        receiver varchar(30) not null,
        subj varchar(255) default 'No subject',
        msg text,
        created_at timestamp default CURRENT_TIMESTAMP,
        updated_at timestamp,
        primary key (_id),
        foreign key (sender) references usercache(objectId) on delete cascade,
        foreign key (receiver) references usercache(objectId) on delete cascade
    );
