Repositório do Trabalho de Prog Web2 - UFMS 2019

Antes de executar, remova o '-master' do nome do diretório extraído.

Link para o vídeo demonstração no Youtube: https://youtu.be/Y9hJ5eRIIEc

O #CodeHumor é um projeto desenvolvido como trabalho da disciplina ProgWeb2 no curso de Sistemas de Informação da UFMS.
O intuito do projeto é desenvolver uma aplicação usando os conceitos de WebService,
dito isso todas as publicações são carregadas de um JSON enviado por outra aplicação.


Alunos

    José Vitor Gualdi
    Leonardo Gonçalves
    Luca Fidelis
    Thiago Palhari

Script de criação do banco de dados e inserção de imagens que já estão no diretório media/

CREATE DATABASE codehumor;

CREATE TABLE _publication(
    id serial,
    path character varying,
    title character varying,
    time timestamp without time zone,
    primary key(id)
);

INSERT INTO _publication (title, path, time)
VALUES ('Diminuiu o QI da rua inteira', 'media/20191121014150noobs.jpg', '2019-11-21 01:41:50');

INSERT INTO _publication (title, path, time)
VALUES ('Excel pra quê??', 'media/20191121013318excel.jpg', '2019-11-21 01:33:18');

INSERT INTO _publication (title, path, time)
VALUES ('Boas Práticas de Programação', 'media/20191121011557hmmmmm.jpg', '2019-11-21 01:15:57');

INSERT INTO _publication (title, path, time)
VALUES ('COOKIES!!', 'media/20191121011500cookies.jpg', '2019-11-21 01:15:00');

INSERT INTO _publication (title, path, time)
VALUES ('Programadores JS', 'media/20191121021531concat.jpg', '2019-11-21 02:15:31');

INSERT INTO _publication (title, path, time)
VALUES ('Fácil demais!!', 'media/20191120174206drones.jpg', '2019-11-20 17:42:06');
