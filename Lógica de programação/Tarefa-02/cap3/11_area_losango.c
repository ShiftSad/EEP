#include <stdio.h>

int main() {
    float diagonal1, diagonal2;

    printf("Digite a diagonal 1: ");
    scanf("%f", &diagonal1);
    printf("Digite a diagonal 2: ");
    scanf("%f", &diagonal2);

    printf("Área do losango: %.2f\n", diagonal1 * diagonal2 / 2);
}