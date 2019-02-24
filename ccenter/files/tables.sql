drop table if exists [dbo].[accounts];

create table accounts(
	[id] int identity(1,1) primary key,
	[email] char(255) unique check([email] like '%(\.+\@+)(.{5,254})%'),
	[username] char(64) unique check([username] like '[:d]{2,64}'),
	[password25] char(25) not null check([password25] like '[\w\W ]{8,25}/gu'),
	[mobile_phone] char(10) not null check([mobile_phone] like '[\d]{6,10}/gu')
);

insert into [accounts]
values (
	'maxpyger@gmail.com',
	'Hrache Toomasyan',
	'16asdf/*asd-f652131',
	'77269466'
);

select * from [information_schema].[columns];
select * from [information_schema].[tables];

create table account_details(
	[name] char(255) default '',
	[surname] char(255) default '',
	[middlename] char(255) default '',
	[countrycode] char(3),
	[accountid] int,
	constraint [fk_accountid] foreign key (accountid) references accounts(id),
	constraint [fk_countrycode] foreign key (countrycode) references country(code)
);

select [name] from [dbo].[country] where [country].[name] LIKE '/\w+/';