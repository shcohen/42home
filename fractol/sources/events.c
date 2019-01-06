/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   events.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 21:02:04 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:19:08 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

int		ft_keycode2(int key, t_all *all)
{
	if (key == ONE)
		all->key.color_r += 5;
	if (key == TWO)
		all->key.color_g += 5;
	if (key == THREE)
		all->key.color_b += 5;
	if (key == FOUR)
		all->key.color_r -= 5;
	if (key == FIVE)
		all->key.color_g -= 5;
	if (key == SIX)
		all->key.color_b -= 5;
	if (key == M)
		all->key.mouse = 1;
	if (key == X)
		all->key.mouse = 0;
	if (key == POINT)
		all->key.click = 1;
	if (key == COMA)
		all->key.click = 0;
	ft_redraw(all);
	return (0);
}

int		ft_keycode(int key, t_all *all)
{
	if (key == 53)
		exit(0);
	if (key == W)
		all->fra.my += 0.1;
	if (key == S)
		all->fra.my -= 0.1;
	if (key == A)
		all->fra.mx += 0.1;
	if (key == D)
		all->fra.mx -= 0.1;
	if (key == PLUS)
		all->fra.max_iter += 5;
	if (key == MINUS)
		all->fra.max_iter -= 5;
	if (key == 15)
	{
		ft_init_keycode(all);
		ft_init_fractal(all);
	}
	ft_keycode2(key, all);
	return (0);
}

int		ft_motion_hook(int x, int y, t_all *all)
{
	if (x < all->mlx.width && y < all->mlx.height && all->key.mouse == 1)
	{
		all->fra.c_r = (x < all->mlx.width / 2) ? (all->fra.c_r + 0.01) :
			(all->fra.c_r - 0.01);
		all->fra.c_i = (y < all->mlx.height / 2) ? (all->fra.c_i + 0.01) :
			(all->fra.c_i - 0.01);
		ft_redraw(all);
	}
	return (0);
}

int		ft_mousehook(int button, int x, int y, t_all *all)
{
	if ((button == LEFT_CLICK && all->key.click == 1) || button == MOUSE_UP)
	{
		all->key.zoom *= 1.1;
		all->fra.x1 = all->fra.x1 + ((double)x - ((double)all->mlx.width / 2))
			/ all->key.zoom;
		all->fra.y1 = all->fra.y1 + ((double)y - ((double)all->mlx.height / 2))
			/ all->key.zoom;
	}
	if ((button == RIGHT_CLICK && all->key.click == 1) || button == MOUSE_DOWN)
	{
		all->key.zoom *= 0.8;
		all->fra.x1 = all->fra.x1 + ((double)x - ((double)all->mlx.width / 2))
			/ all->key.zoom;
		all->fra.y1 = all->fra.y1 + ((double)y - ((double)all->mlx.height / 2))
			/ all->key.zoom;
	}
	ft_redraw(all);
	return (0);
}
