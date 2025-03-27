#include <stdio.h>

int main() {
    int sides;
    printf("Digite o número de lados do polígono: ");
    scanf("%d", &sides);

    printf("Número de diagonais: %d\n", sides * (sides - 3) / 2);
}