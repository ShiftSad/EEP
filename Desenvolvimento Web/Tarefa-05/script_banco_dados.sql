-- SQL - LINGUAGEM DE CONSULTA ESTRUTURADA 
-- STRUCTURED QUERY LANGUAGE

CREATE DATABASE IF NOT EXISTS clerivaldo; -- Garante que o banco seja criado
USE clerivaldo; -- Selecionar o banco para uso

-- criar tabela usuarios
CREATE TABLE Usuarios
(
   id int auto_increment primary key,
   nome varchar(100),    
   email varchar(100),
   senha varchar(20)
);

--criar tabela alunos
CREATE TABLE Alunos
(
  id int auto_increment primary key,
  nome varchar(100),
  ra varchar(10),
  idade int
);

CREATE TABLE IF NOT EXISTS Professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rf VARCHAR(20) UNIQUE,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    idade INT
);






