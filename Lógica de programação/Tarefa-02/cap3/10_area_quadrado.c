#include <stdio.h>

int main() {
    float side;

    printf("Digite o lado do quadrado: ");
    scanf("%f", &side);

    printf("Área do quadrado: %.2f\n", side * side);
}