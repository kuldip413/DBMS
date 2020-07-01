
create table user (
	firstname varchar(100) not null,
	lastname varchar(100) not null,
	email varchar(100) not null,
	aadhar bigint(15) not null,
	address varchar(100) not null,
	username varchar(100) primary key not null,
	password varchar(100) not null,
	phone_area_code varchar(20) not null,
	phone_number bigint(12) not null,
	gender varchar(20) not null
);

create table admin(
	admin_username varchar(100) not null,
	admin_password varchar(100) not null
);

create table locations(
	district varchar(100) not null,
	tehsil varchar(100) not null,
	town varchar(100) not null,
	locality varchar(100) not null,
	pin_code bigint(12) not null
);


insert into locations values ("Kanpur Nagar", "Kanpur", "Bithoor", "Ward no. 5", "208021");
insert into admin values ("admin", "$admin$");


create table fir(
	fir_id bigint(10) not null AUTO_INCREMENT primary key,
	firstname varchar(100) not null,
	lastname varchar(100) not null,
	email varchar(100) not null,
	phone_area_code varchar(20) not null,
	phone_number bigint(12) not null,
	gender varchar(20) not null,
	date_of_crime date not null,
	complaint_type varchar(100) not null,
	district varchar(100) not null,
	tehsil varchar(100) not null,
	town varchar(100) not null,
	locality varchar(100) not null,
	street varchar(100),
	house_number varchar(100),
	pin_code bigint(12) not null,
	description varchar(10000) not null,
	case_status varchar(1000) not null default "Case under investigation",
	sub_id bigint(10)
);

create table police_station(
	district varchar(100) not null,
	tehsil varchar(100) not null,
	town varchar(100) not null,
	locality varchar(100) not null,
	pin_code bigint(12) not null,
	police_station varchar(500) not null,
	ps_id bigint(10) not null AUTO_INCREMENT primary key,
	unique key(district, tehsil, town, locality, pin_code)
);


create table police_inspector(
	ps_id bigint(10) not null, 
	police_station varchar(500) not null unique,
	inspector_name varchar(50) not null,
	inspector_contact bigint(12) not null,
	username varchar(100) primary key not null,
	password varchar(100) not null
);


create table update_fir(
	fir_id bigint(10) not null,
	fir_update varchar(200) not null,
	date_of_update timestamp not null default current_timestamp
);




create table criminal(
	image LONGBLOB not null,
	criminal_id bigint(10) not null AUTO_INCREMENT primary key,
	criminal_rating varchar(100) not null,
	criminal_name varchar(100) not null,
	criminal_identification varchar(100) not null
);


create table sub_inspector(
	sub_id bigint(10) not null AUTO_INCREMENT primary key,
	ps_id bigint(10) not null, 
	police_station varchar(500) not null,
	sub_inspector_name varchar(50) not null,
	sub_inspector_contact bigint(12) not null
);







