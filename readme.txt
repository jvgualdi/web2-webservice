Repositório do Trabalho de Prog Web2 - UFMS 2019


O #CodeHumor é um projeto desenvolvido como trabalho da disciplina ProgWeb2 no curso de Sistemas de Informação da UFMS.
O intuito do projeto é desenvolver uma aplicação usando os conceitos de WebService,
dito isso todas as publicações são carregadas de um JSON enviado por outra aplicação.


Alunos

    José Vitor Gualdi
    Leonardo Gonçalves
    Luca Fidelis
    Thiago Palhari


Link do Github: https://github.com/luscafidelis/web2-webservice

Script de criação do banco de dados e inserção de imagens que já estão no diretório media/

CREATE DATABASE codehumor;

CREATE TABLE _publication(
    id serial,
    path varying character,
    title varying character,
    time timestamp without time zone,
    primary key(id)
);

INSERT INTO _publication (title, path, time)
VALUES ('Diminuiu o QI da rua inteira', '20191121014150noobs.jpg', '2019-11-21 01:41:50');

INSERT INTO _publication (title, path, time)
VALUES ('Excel pra quê??', '20191121013318excel.jpg', '2019-11-21 01:33:18');

INSERT INTO _publication (title, path, time)
VALUES ('Boas Práticas de Programação', '20191121011557hmmmmm.jpg', '2019-11-21 01:15:57');
