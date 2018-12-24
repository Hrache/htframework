create table accounts(
	[id] int identity(1,1) primary key,
	[email] char(255) unique,
	[username] char(64) unique,
	[password64] char(64) not null,
	[mobile_phone] char(10) not null
);

create table account_details(
	[name] char(255) default '',
	[surname] char(255) default '',
	[middlename] char(255) default '',
	[countrycode] char(3),
	[accountid] int,
	constraint [fk_accountid] foreign key (accountid) references accounts(id),
	constraint [fk_countrycode] foreign key (countrycode) references country(code)
);