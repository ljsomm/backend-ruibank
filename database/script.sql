CREATE DATABASE db_ruibank;
USE db_ruibank;

CREATE TABLE tb_conta(
cd_conta INT NOT NULL,
cd_cpf VARCHAR(11),
cd_senha VARCHAR(150),
vl_saldo DECIMAL(10,2),
CONSTRAINT pk_conta
	PRIMARY KEY (cd_conta)
);

CREATE TABLE tb_transacao(
cd_transacao INT NOT NULL,
cd_hash VARCHAR(32),
cd_conta_origem INT NOT NULL,
cd_conta_destino INT NOT NULL,
dt_transferencia TIMESTAMP,
vl_transferencia DECIMAL(10,2),
CONSTRAINT pk_transacao
	PRIMARY KEY(cd_transacao),
CONSTRAINT uk_transacao
	UNIQUE(cd_hash),
CONSTRAINT fk_transacao_origem
	FOREIGN KEY(cd_conta_origem)
		REFERENCES tb_conta(cd_conta),
CONSTRAINT fk_transacao_destino
	FOREIGN KEY(cd_conta_destino)
		REFERENCES tb_conta(cd_conta)
);

