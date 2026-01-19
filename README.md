# Część obowiązkowa

## Opis aplikacji
Zaimplementowano aplikację w stacku LAMP (PHP+MySQL) weryfikującą połączenie z bazą danych. Kod źródłowy wstrzykiwany jest dynamicznie przez ConfigMap, a dostęp zewnętrzny zapewnia kontroler Ingress

## Inicjalizacja klastra
<img width="1366" height="508" alt="image" src="https://github.com/user-attachments/assets/c2b35402-d175-4681-bf03-05f3dea8a30a" />

## Aktywacja kontrolera Ingress
<img width="1532" height="368" alt="image" src="https://github.com/user-attachments/assets/807cf978-b762-44f6-a2a0-68b25c1a85e6" />

## Zbudowanie obrazu dockera z obsługą MySQL
<img width="986" height="477" alt="image" src="https://github.com/user-attachments/assets/428113a6-99cb-4dc3-986a-f2f8551f572f" />

## Konfiguracja DNS
### IP Klastra
<img width="506" height="102" alt="image" src="https://github.com/user-attachments/assets/58e69140-7e42-4c24-b6ad-dfc54e35a965" />

### Mapowanie domeny na adres IP klastra
<img width="1100" height="334" alt="image" src="https://github.com/user-attachments/assets/e4305764-8922-4758-a4b4-92e1de9a35ec" />

## Tworzenie obiektów klastra
<img width="869" height="103" alt="image" src="https://github.com/user-attachments/assets/849653f5-4beb-4b3b-bf2a-1aab89cb9891" />

## Uruchomienie manifestów
<img width="884" height="565" alt="image" src="https://github.com/user-attachments/assets/fbaeef89-7f48-419c-af1f-d8d5a8bbc52c" />

## Weryfikacja podów i ingressa
<img width="985" height="404" alt="image" src="https://github.com/user-attachments/assets/ab6b4064-b898-46fb-b163-d9cd6dc84c9e" />

## Widok aplikacji
<img width="534" height="345" alt="image" src="https://github.com/user-attachments/assets/bbd6396a-b741-4211-aa79-10a3468cb0ba" />

# Część nieobowiązkowa
## Opis zmian
### Stan początkowy
<img width="718" height="373" alt="image" src="https://github.com/user-attachments/assets/e9b6b244-abb4-4c26-9c03-cb0ff6f7dbb2" />

Po dokonaniu zmian wersja 1.0 ma zmienić się na wersje 2.0


## Aktualizacja obiektu ConfigMap
<img width="1916" height="196" alt="image" src="https://github.com/user-attachments/assets/8801eb49-955e-4c03-8c88-9d7313d5cc1a" />

## Uruchomienie aktualizacji
<img width="805" height="103" alt="image" src="https://github.com/user-attachments/assets/5b09652f-cd84-4f8a-8786-afaeacac40ec" />

## Proces aktualizacji bez przerwy
<img width="1494" height="295" alt="image" src="https://github.com/user-attachments/assets/71a17081-728e-40ec-9da7-4297d3f55beb" />

## Zmiana po update
<img width="734" height="732" alt="image" src="https://github.com/user-attachments/assets/6b5d9ba1-2109-40fc-8a78-b2275d10327d" />

## Wdrożenie sondy
Dodałem **livenessProbe** i **readinessProbe** w pliku **webapp.yaml**
<img width="508" height="1542" alt="image" src="https://github.com/user-attachments/assets/a08d36d1-4d46-46e8-8ebf-facbb27a4a44" />

- **LivenessProbe (TCP Socket na porcie 80)**

  Jeśli port przestanie odpowiadać, Kubernetes zrestartuje kontener, automatycznie naprawiając zawieszony proces.

- **ReadinessProbe (HTTP GET na ścieżce /)**
  
  Skrypt PHP zwraca kod HTTP 500 w przypadku braku połączenia z bazą. Sonda wykrywa ten błąd i odcina ruch sieciowy do uszkodzonego poda bez restartowania go. Dzięki temu użytkownik nie zobaczy komunikatów o błędach, a ruch trafi tylko do w pełni sprawnych instancji.


