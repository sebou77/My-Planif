import { MyPlanifPage } from './app.po';

describe('my-planif App', () => {
  let page: MyPlanifPage;

  beforeEach(() => {
    page = new MyPlanifPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
