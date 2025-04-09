#include <stdio.h>

int main() {
    float salario, gratificacao, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 350) {
        gratificacao = 100;
    } else if (salario <= 600) {
        gratificacao = 75;
    } else if (salario <= 900) {
        gratificacao = 50;
    } else {
        gratificacao = 35;
    }

    novoSalario = salario + gratificacao;

    printf("Novo salario com gratificacao: %.2f\n", novoSalario);
}