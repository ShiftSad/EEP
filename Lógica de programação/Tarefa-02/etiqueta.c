#include <stdio.h>

int main() {
  struct {
    char nome[50];
    char endereco[100];
    char cep[9];
    char telefone[15];
  } pessoa;

  printf("Nome: ");
  gets(pessoa.nome);
  printf("Endereco: ");
  gets(pessoa.endereco);
  printf("CEP: ");
  gets(pessoa.cep);
  printf("Telefone: ");
  gets(pessoa.telefone);

  printf("\n\n");
  printf("Nome: %s\n", pessoa.nome);
  printf("Endereco: %s\n", pessoa.endereco);
  printf("CEP: %s\n", pessoa.cep);
  printf("Telefone: %s\n", pessoa.telefone);
}