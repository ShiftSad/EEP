#include <stdio.h>

int main() {
    float a, b;
    int opcao;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    printf("Escolha uma opcao:\n");
    printf("1 - Primeiro elevado ao segundo\n");
    printf("2 - Raiz de cada um\n");
    printf("3 - Raiz cúbica de cada um\n");

    printf("Opcao: ");
    scanf("%d", &opcao);

    switch (opcao) {
        case 1:
            printf("Resultado: %.2f\n", pow(a, b));
            break;
        case 2:
            printf("Raiz de %.2f: %.2f\n", a, sqrt(a));
            printf("Raiz de %.2f: %.2f\n", b, sqrt(b));
            break;
        case 3:
            printf("Raiz cúbica de %.2f: %.2f\n", a, cbrt(a));
            printf("Raiz cúbica de %.2f: %.2f\n", b, cbrt(b));
            break;
        default:
            printf("Opcao invalida.\n");
    }
}