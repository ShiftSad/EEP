#include <stdio.h>

int main() {
    float a, b;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    int opcao;
    printf("Escolha uma opcao:\n");
    printf("1 - Média\n");
    printf("2 - Diferança\n");
    printf("3 - Produto\n");
    printf("4 - Divisão\n");

    printf("Opcao: ");
    scanf("%d", &opcao);

    if (opcao == 1) {
        printf("A media e: %.2f\n", (a + b) / 2);
    } else if (opcao == 2) {
        printf("A diferenca e: %.2f\n", a - b);
    } else if (opcao == 3) {
        printf("O produto e: %.2f\n", a * b);
    } else if (opcao == 4) {
        if (b != 0) {
            printf("A divisao e: %.2f\n", a / b);
        } else {
            printf("Divisao por zero nao e permitida.\n");
        }
    } else {
        printf("Opcao invalida.\n");
    }
}