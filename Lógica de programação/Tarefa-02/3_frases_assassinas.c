#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main() {
  char frases[6][100] = {
    "Você vai falhar",
    "Você é insuficiente",
    "Nada que você faz vai dar certo",
    "Seu bobalhão!",
    "Vai dar em nada",
    "Não fez mais que o mínimo",
  };

  srand(time(NULL));
  int i = rand() % 6;
  printf("%s\n", frases[i]);
  return 0;
}
