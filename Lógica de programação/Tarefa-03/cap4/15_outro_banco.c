#include <stdio.h>

//tipo investimento e valor
// tipo 1 = poupança 3% mensal
// tipo 2 = fundos de renda fixa 4% mensal

int main() {
    float valor, rendimento, total;
    int tipo, meses;

    printf("Digite o valor do investimento: ");
    scanf("%f", &valor);

    printf("Escolha o tipo de investimento (1 - Poupança, 2 - Fundos de Renda Fixa): ");
    scanf("%d", &tipo);

    printf("Digite o número de meses: ");
    scanf("%d", &meses);

    if (tipo == 1) {
        rendimento = valor * 0.03 * meses;
    } else if (tipo == 2) {
        rendimento = valor * 0.04 * meses;
    } else {
        printf("Tipo de investimento inválido.\n");
        return 1;
    }

    total = valor + rendimento;

    printf("Valor total após %d meses: %.2f\n", meses, total);
}