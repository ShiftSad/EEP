#include <stdio.h>

int main() {
    float salario, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        novoSalario = salario * 1.15; // Aumenta 15%
    } else if (salario > 300 && salario <= 600) {
        novoSalario = salario * 1.10; // Aumenta 10%
    } else if (salario > 600 && salario <= 900) {
        novoSalario = salario * 1.05; // Aumenta 5%
    } else {
        novoSalario = salario; // Sem aumento
    }

    printf("Novo salario: %.2f\n", novoSalario);
}