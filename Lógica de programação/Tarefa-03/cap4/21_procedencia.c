#include <stdio.h>

// 1 = sul
// 2 = norte
// 3 leste
// 4 = oeste
// 5 6 nordeste
// 7 8 9 sudeste
// 10 a 20 centro oeste
// 21 a 30 nordeste

int main() {
    int estado, procedencia;
    printf("Digite o estado de procedencia (1 - Sul, 2 - Norte, 3 - Leste, 4 - Oeste, 5 - Nordeste, 6 - Sudeste, 7 - Centro-Oeste): ");
    scanf("%d", &estado);

    if (estado == 1 || estado == 2) {
        procedencia = 1; // Sul ou Norte
    } else if (estado == 3 || estado == 4) {
        procedencia = 2; // Leste ou Oeste
    } else if (estado >= 5 && estado <= 6) {
        procedencia = 3; // Nordeste ou Sudeste
    } else if (estado >= 7 && estado <= 20) {
        procedencia = 4; // Centro-Oeste
    } else if (estado >= 21 && estado <= 30) {
        procedencia = 5; // Nordeste
    } else {
        printf("Estado invalido.\n");
        return 1;
    }

    printf("A procedencia e: %d\n", procedencia);
    return 0;
}