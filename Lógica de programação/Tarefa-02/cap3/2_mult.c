#include <stdio.h>

int main() {
    int first;
    int second;
    int third;

    printf("Digite o primeiro número: ");
    scanf("%d", &first);
    printf("Digite o segundo número: ");
    scanf("%d", &second);
    printf("Digite o terceiro número: ");
    scanf("%d", &third);

    printf("Multiplicação: %d\n", first * second * third);
}