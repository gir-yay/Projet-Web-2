-- projet web 2024
-- db name : prjw

use prjw;

-- Table structure for table `clients`

create table clients(
    client_id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password_ varchar(15) not null
);

-- table structure for table `services`
create table services(
    service_id int primary key auto_increment,
    nom varchar(255) not null
);

-- Table structure for table `experts`
create table experts(
    expert_id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password_ varchar(15) not null,
    photo varchar(70),
    metier varchar(100) not null,
    ville varchar(100) not null
);

-- Table structure for table `service_expert` (many to many relationship)

create table service_expert(
    expert_id int not null,
    service_id int not null,
    nbr_annee_d_exp int,
    disponibilite varchar(255),
    duree varchar(100),
    prix_par_duree float,
    foreign key (expert_id) references experts(expert_id),
    foreign key (service_id) references services(service_id),
    primary key (expert_id, service_id)
);

-- Table structure for table `admin`
create table admins(
    admin_id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password_ varchar(15) not null
);


-- Table structure for table `commentaires_sur_clients`
create table commentaires_sur_clients(
    commentaire_id int primary key auto_increment,
    note int not null,
    client_id int not null,
    expert_id int not null,
    commentaire varchar(255) not null,
    foreign key (client_id) references clients(client_id),
    foreign key (expert_id) references experts(expert_id)
);

create table commentaires_sur_experts(
    commentaire_id int primary key auto_increment,
    note int not null,
    client_id int not null,
    expert_id int not null,
    service_id int not null,
    commentaire varchar(255) not null,
    foreign key (client_id) references clients(client_id),
    foreign key (expert_id) references experts(expert_id),
    foreign key (service_id) references services(service_id)
);

-- Table structure for table `demandes_clients`
create table demandes_clients(
    demande_id int primary key auto_increment,
    client_id int not null,
    expert_id int not null,
    service_id int not null,
    date_demande date not null,
    date_debut date not null,
    date_fin date not null,
    duree varchar(100) not null,
    etat varchar(50) not null,
    foreign key (client_id) references clients(client_id),
    foreign key (expert_id) references experts(expert_id),
    foreign key (service_id) references services(service_id)
);
