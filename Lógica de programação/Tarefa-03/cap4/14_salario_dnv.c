#include <stdio.h>

int main() {
    float salario, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        novoSalario = salario * 1.50; // Aumenta 50%
    } else if (salario > 300 && salario <= 500) {
        novoSalario = salario * 1.40; // Aumenta 40%
    } else if (salario > 500 && salario <= 700) {
        novoSalario = salario * 1.30; // Aumenta 30%
    } else if (salario > 700 && salario <= 800) {
        novoSalario = salario * 1.20; // Aumenta 20%
    } else if (salario > 800 && salario <= 1000) {
        novoSalario = salario * 1.10; // Aumenta 10%
    } else {
        novoSalario = salario * 1.05; // Aumenta 5%
    }

    printf("Novo salario: %.2f\n", novoSalario);
}