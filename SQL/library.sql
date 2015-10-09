Create Database Library CHARACTER SET utf8 COLLATE utf8_general_ci;
use Library;

Create Table Categories (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name nvarchar(255) NOT NULL
)  ENGINE=InnoDB;

Create Table Publishers (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name nvarchar(255) NOT NULL
)  ENGINE=InnoDB;

Create Table Books (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name nvarchar(255) NOT NULL,
    pages int NOT NULL,
    date Date NOT NULL,
    category_id int NOT NULL,
    publisher_id int NOT NULL,
    foreign key(category_id) references Categories(id),
    foreign key(publisher_id) references Publishers(id)
) ENGINE=InnoDB;

Create Table Authors (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name nvarchar(255) NOT NULL,
    surname nvarchar(255) NOT NULL,
    birthdate Date NOT NULL
) ENGINE=InnoDB;

Create Table BooksAuthors (
    book_id int NOT NULL,
    author_id int NOT NULL,
    foreign key(author_id) references Authors(id),
    foreign key(book_id) references Books(id)
) ENGINE=InnoDB;

Insert Into Categories (name) Values
    ('Поэзия'),
    ('Проза');

Insert Into Authors (name, surname, birthDate) Values
    ('Александр', 'Пушкин', '1789-05-01'),
    ('Лев', 'Толстой', '1780-03-05');

Insert Into Publishers(name) Values
    ('PUB XXX'),
    ('PUB ZZZ');

Insert Into Books (name, pages, date, category_id, publisher_id) Values
    ('Война и мир', 1000, '1824-11-10',
        (Select id From Categories Where name='Проза'),
        (Select id From Publishers Where name='PUB XXX')
    ),
    ('Евгений Онегин', 300, '1817-04-21',
        (Select id From Categories Where name='Поэзия'),
        (Select id From Publishers Where name='PUB ZZZ')
    );

Insert Into BooksAuthors (book_id, author_id) Values
    (
        (Select id From Books Where name = 'Евгений Онегин'),
        (Select id From Authors Where surname = 'Пушкин')
    ),
    (
        (Select id From Books Where name = 'Война и мир'),
        (Select id From Authors Where surname = 'Толстой')
    );