#include <stdio.h>

int main() {
    float horasExtras, horasFaltou, salario, salarioFinal;
    int categoria;

    printf("Digite o numero de horas extras: ");
    scanf("%f", &horasExtras);
    printf("Digite o numero de horas que faltou: ");
    scanf("%f", &horasFaltou);
    printf("Digite a categoria do funcionario (1 a 5): ");
    scanf("%d", &categoria);

    // Calculo do salario
    salario = (horasExtras - (2.0 / 3.0) * horasFaltou) * 10; // 10 reais por hora

    // Verifica a categoria e aplica o desconto
    if (salario >= 2400) {
        salarioFinal = salario - 500;
    } else if (salario >= 1800) {
        salarioFinal = salario - 400;
    } else if (salario >= 1200) {
        salarioFinal = salario - 300;
    } else if (salario >= 600) {
        salarioFinal = salario - 200;
    } else {
        salarioFinal = salario - 100;
    }

    printf("Salario final: %.2f\n", salarioFinal);
}